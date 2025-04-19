// DOM Elements
const chatMessages = document.getElementById('chat-messages');
const userInput = document.getElementById('user-input');
const sendButton = document.getElementById('send-button');
const modelButtons = document.querySelectorAll('.model-button');

// API Configurations
const API_CONFIGS = {
  // Drone API (Armstrong)
  drone: {
    endpoint: "https://private-4.app.flowiseai.com/api/v1/prediction/43cfb238-4864-4599-866e-d8ec24235203",
    token: "TbvVxMkNs5R5q2DfwAVTjRtqGrFvz2484HzIyK0Owis",
    type: "flowise",
    name: "Armstrong"
  },
  // 5MCC API - Below Armstrong's little bubble
  "5mcc": {
    endpoint: "https://private-4.app.flowiseai.com/api/v1/prediction/3e400cbb-9c0f-4925-9b4e-d1d51f55d369",
    token: "TbvVxMkNs5R5q2DfwAVTjRtqGrFvz2484HzIyK0Owis",
    type: "flowise",
    name: "5MCC"
  },
  // Perplexity API (Precision Guesswork Inc.)
  pplx: {
    endpoint: "https://api.perplexity.ai/chat/completions",
    token: "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",
    model: "sonar-pro",
    type: "perplexity",
    name: "Precision Guesswork Inc."
  }
};

// Current active model
let currentModel = "drone";

// Chat history for context (separate for each model)
const modelChatHistory = {
  drone: [],
  "5mcc": [],
  pplx: []
};

// Initialize chat
document.addEventListener('DOMContentLoaded', () => {
  // Add welcome message for default model
  const welcomeMessage = "Welcome to Armstrong. How can I assist with your drone mission today?";
  addMessage(welcomeMessage, "api");
  
  // Store welcome message in chat history
  modelChatHistory.drone.push({
    role: "assistant",
    content: welcomeMessage
  });
  
  // Event listeners
  sendButton.addEventListener('click', handleSendMessage);
  userInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') handleSendMessage();
  });
  
  // Model selection buttons
  modelButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Update current model
      currentModel = button.dataset.model;
      
      // Update active button
      modelButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      
      // Clear chat display
      chatMessages.innerHTML = '';
      
      // Add model-specific welcome message if history is empty
      if (modelChatHistory[currentModel].length === 0) {
        let welcomeMessage = "";
        switch(currentModel) {
          case "drone":
            welcomeMessage = "Welcome to Armstrong. How can I assist with your drone mission today?";
            break;
          case "5mcc":
            welcomeMessage = "5MCC Mission Control Center activated. How may I assist you?";
            break;
          case "pplx":
            welcomeMessage = `${API_CONFIGS.pplx.name} (${API_CONFIGS.pplx.model}) at your service. What would you like to know?`;
            break;
          default:
            welcomeMessage = "Mission Control online. How can I help you today?";
        }
        
        addMessage(welcomeMessage, "api");
        modelChatHistory[currentModel].push({
          role: "assistant",
          content: welcomeMessage
        });
      } else {
        // Display existing chat history for this model
        modelChatHistory[currentModel].forEach(msg => {
          addMessage(msg.content, msg.role === "assistant" ? "api" : "user");
        });
      }
      
      // Update model info display
      const modelInfo = document.getElementById('model-info');
      if (modelInfo) {
        modelInfo.textContent = `Active: ${API_CONFIGS[currentModel].name}${currentModel === "pplx" ? ` (${API_CONFIGS[currentModel].model})` : ''}`;
      }
      
      // Focus input field
      userInput.focus();
    });
  });
  
  // Add model info display
  const modelInfo = document.createElement('div');
  modelInfo.id = 'model-info';
  modelInfo.className = 'model-info';
  modelInfo.textContent = `Active: ${API_CONFIGS.drone.name}`;
  document.querySelector('.model-selector').appendChild(modelInfo);
  
  // Focus input field on load
  userInput.focus();
  
  // Add visual feedback when input is focused
  userInput.addEventListener('focus', () => {
    document.querySelector('.chat-container').classList.add('focused');
  });
  
  userInput.addEventListener('blur', () => {
    document.querySelector('.chat-container').classList.remove('focused');
  });
});

// Handle sending messages
async function handleSendMessage() {
  const message = userInput.value.trim();
  if (!message) return;
  
  // Add user message to chat
  addMessage(message, "user");
  
  // Store user message in chat history
  modelChatHistory[currentModel].push({
    role: "user",
    content: message
  });
  
  // Clear input field
  userInput.value = "";
  
  // Disable input and button during processing
  userInput.disabled = true;
  sendButton.disabled = true;
  
  // Show typing indicator
  const typingIndicator = showTypingIndicator();
  
  try {
    // Create message container for streaming response
    const messageElement = document.createElement('div');
    messageElement.className = 'message api-message';
    chatMessages.appendChild(messageElement);
    
    // Call API with streaming based on current model
    let responseText = '';
    
    if (API_CONFIGS[currentModel].type === "flowise") {
      responseText = await streamFlowiseResponse(message, messageElement);
    } else if (API_CONFIGS[currentModel].type === "perplexity") {
      responseText = await streamPerplexityResponse(message, messageElement);
    }
    
    // Store API response in chat history
    if (responseText) {
      modelChatHistory[currentModel].push({
        role: "assistant",
        content: responseText
      });
      
      // Limit chat history to last 10 messages to prevent token overflow
      if (modelChatHistory[currentModel].length > 10) {
        modelChatHistory[currentModel] = modelChatHistory[currentModel].slice(modelChatHistory[currentModel].length - 10);
      }
    }
    
    // Remove typing indicator
    typingIndicator.remove();
  } catch (error) {
    // Remove typing indicator
    typingIndicator.remove();
    
    // Show error message
    addMessage(`Connection to ${API_CONFIGS[currentModel].name} temporarily unavailable. Please try again later.`, "api");
    console.error("API Error:", error);
  } finally {
    // Re-enable input and button
    userInput.disabled = false;
    sendButton.disabled = false;
    userInput.focus();
  }
  
  // Scroll to bottom of chat
  scrollToBottom();
}

// Stream Flowise chat response (for drone and 5MCC)
async function streamFlowiseResponse(message, messageElement) {
  try {
    const config = API_CONFIGS[currentModel];
    
    // Prepare the request with chat history for context
    const requestData = {
      question: message,
      streaming: true,
      history: modelChatHistory[currentModel].slice(0, -1) // Exclude the most recent user message as it's sent separately
    };
    
    const response = await fetch(config.endpoint, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${config.token}`
      },
      body: JSON.stringify(requestData)
    });

    // Check if response is ok
    if (!response.ok) {
      throw new Error(`Network response error: ${response.status}`);
    }

    // Create a reader from the response body stream
    const reader = response.body.getReader();
    const decoder = new TextDecoder();
    let responseText = '';

    // Read the stream
    while (true) {
      const { done, value } = await reader.read();
      
      if (done) {
        break;
      }
      
      // Decode the chunk and append to response text
      const chunk = decoder.decode(value, { stream: true });
      
      try {
        // Parse the chunk as JSON
        const lines = chunk.split('\n').filter(line => line.trim() !== '');
        
        for (const line of lines) {
          if (line.startsWith('data:')) {
            const jsonStr = line.slice(5).trim();
            const jsonData = JSON.parse(jsonStr);
            
            if (jsonData.event === 'token') {
              responseText += jsonData.data;
              messageElement.textContent = responseText;
              scrollToBottom();
            }
          }
        }
      } catch (e) {
        console.error('Error parsing chunk:', e);
        // If parsing fails, just append the raw chunk
        responseText += chunk;
        messageElement.textContent = responseText;
      }
    }

    // If no text was received, show an error message
    if (!responseText) {
      messageElement.textContent = "I apologize, but I couldn't process your request properly.";
    }
    
    return responseText;
  } catch (error) {
    console.error('Streaming error:', error);
    throw error;
  }
}

// Stream Perplexity API response
async function streamPerplexityResponse(message, messageElement) {
  try {
    const config = API_CONFIGS.pplx;
    
    // Prepare the request data for Perplexity
    const requestData = {
      temperature: 0.1,
      top_p: 0.9,
      search_domain_filter: [null],
      return_images: false,
      return_related_questions: false,
      top_k: 0,
      stream: true,
      presence_penalty: 0,
      frequency_penalty: 1,
      model: config.model,
      messages: [
        // Include chat history
        ...modelChatHistory.pplx.map(msg => ({
          content: msg.content,
          role: msg.role
        })),
        // Add current message
        {
          content: message,
          role: "user"
        }
      ],
      response_format: {}
    };
    
    // Log the request for debugging
    console.log(`Sending request to ${config.name} with model ${config.model}`);
    
    const response = await fetch(config.endpoint, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${config.token}`
      },
      body: JSON.stringify(requestData)
    });

    // Check if response is ok
    if (!response.ok) {
      throw new Error(`Network response error: ${response.status} - ${await response.text()}`);
    }

    // Create a reader from the response body stream
    const reader = response.body.getReader();
    const decoder = new TextDecoder();
    let responseText = '';

    // Read the stream
    while (true) {
      const { done, value } = await reader.read();
      
      if (done) {
        break;
      }
      
      // Decode the chunk
      const chunk = decoder.decode(value, { stream: true });
      
      try {
        // Parse the chunk as JSON
        const data = JSON.parse(chunk);
        
        if (data.choices && data.choices[0] && data.choices[0].delta && data.choices[0].delta.content) {
          const token = data.choices[0].delta.content;
          responseText += token;
          messageElement.textContent = responseText;
          scrollToBottom();
        }
      } catch (e) {
        console.error('Error parsing chunk:', e);
        // If parsing fails, handle streaming data differently
        // This may require adjusting based on the actual response format
        try {
          // Try to extract content from the raw chunk if it's a streaming response
          const lines = chunk.split('\n').filter(line => line.trim() !== '');
          for (const line of lines) {
            if (line.startsWith('data:')) {
              try {
                const jsonStr = line.slice(5).trim();
                if (jsonStr === '[DONE]') continue;
                
                const jsonData = JSON.parse(jsonStr);
                if (jsonData.choices && jsonData.choices[0] && jsonData.choices[0].delta && jsonData.choices[0].delta.content) {
                  const token = jsonData.choices[0].delta.content;
                  responseText += token;
                  messageElement.textContent = responseText;
                  scrollToBottom();
                }
              } catch (innerError) {
                console.error('Error parsing streaming data line:', innerError);
              }
            }
          }
        } catch (streamError) {
          console.error('Error processing streaming data:', streamError);
        }
      }
    }

    // If no text was received, show an error message
    if (!responseText) {
      messageElement.textContent = "I apologize, but I couldn't process your request properly.";
    }
    
    return responseText;
  } catch (error) {
    console.error('Streaming error:', error);
    throw error;
  }
}

// Call the chat API (non-streaming fallback)
async function callChatAPI(message) {
  const config = API_CONFIGS[currentModel];
  
  // Prepare the request with chat history for context
  const requestData = {
    question: message,
    history: modelChatHistory[currentModel].slice(0, -1) // Exclude the most recent user message as it's sent separately
  };
  
  // API call based on type
  if (config.type === "flowise") {
    // Flowise API call
    return await queryFlowise(config, requestData);
  } else if (config.type === "perplexity") {
    // Perplexity API call
    return await queryPerplexity(config, message);
  }
}

// Flowise API query function (non-streaming fallback)
async function queryFlowise(config, data) {
  const response = await fetch(config.endpoint, {
    headers: {
      Authorization: `Bearer ${config.token}`,
      "Content-Type": "application/json"
    },
    method: "POST",
    body: JSON.stringify(data)
  });
  
  if (!response.ok) {
    throw new Error(`Network response error: ${response.status}`);
  }
  
  const result = await response.json();
  return result;
}

// Perplexity API query function (non-streaming fallback)
async function queryPerplexity(config, message) {
  const requestData = {
    temperature: 0.1,
    top_p: 0.9,
    search_domain_filter: [null],
    return_images: false,
    return_related_questions: false,
    top_k: 0,
    stream: false,
    presence_penalty: 0,
    frequency_penalty: 1,
    model: config.model,
    messages: [
      // Include chat history
      ...modelChatHistory.pplx.map(msg => ({
        content: msg.content,
        role: msg.role
      })),
      // Add current message
      {
        content: message,
        role: "user"
      }
    ],
    response_format: {}
  };
  
  console.log(`Sending request to ${config.name} with model ${config.model} (non-streaming)`);
  
  const response = await fetch(config.endpoint, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${config.token}`
    },
    body: JSON.stringify(requestData)
  });
  
  if (!response.ok) {
    throw new Error(`Network response error: ${response.status} - ${await response.text()}`);
  }
  
  const result = await response.json();
  return result.choices[0].message.content;
}

// Add message to chat
function addMessage(text, sender) {
  const messageElement = document.createElement('div');
  messageElement.className = `message ${sender}-message`;
  
  // Process markdown-like formatting
  const formattedText = formatText(text);
  messageElement.innerHTML = formattedText;
  
  chatMessages.appendChild(messageElement);
  scrollToBottom();
}

// Format text with basic markdown-like syntax
function formatText(text) {
  // Replace URLs with clickable links
  text = text.replace(
    /(https?:\/\/[^\s]+)/g, 
    '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>'
  );
  
  // Bold text between **
  text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
  
  // Italic text between *
  text = text.replace(/\*(.*?)\*/g, '<em>$1</em>');
  
  // Code blocks
  text = text.replace(/`(.*?)`/g, '<code>$1</code>');
  
  // Convert line breaks to <br>
  text = text.replace(/\n/g, '<br>');
  
  return text;
}

// Show typing indicator
function showTypingIndicator() {
  const typingElement = document.createElement('div');
  typingElement.className = 'typing-indicator';
  
  // Create dots
  for (let i = 0; i < 3; i++) {
    const dot = document.createElement('span');
    dot.className = 'dot';
    typingElement.appendChild(dot);
  }
  
  chatMessages.appendChild(typingElement);
  scrollToBottom();
  
  return typingElement;
}

// Scroll to bottom of chat
function scrollToBottom() {
  chatMessages.scrollTop = chatMessages.scrollHeight;
} 