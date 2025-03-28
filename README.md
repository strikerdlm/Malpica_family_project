# Personal Website

A minimalist, dark-themed website inspired by SpaceX's design language that integrates with the Flowise API for chat functionality. The interface features a space-themed background, clean typography, and a modern chat component with streaming responses.

![Space-Inspired Chat Interface](https://i.imgur.com/placeholder.png)

## Features

- Dark, minimalist UI with space-themed elements
- Clean typography matching SpaceX's style
- Flowise API integration with streaming responses
- Chat history context for more relevant responses
- Responsive design for all device sizes
- Real-time typing indicators
- Markdown-like text formatting
- Error handling for API requests
- Accessibility improvements

## Project Structure

```
personal-website/
├── index.html       # Main HTML file
├── css/
│   └── style.css    # Main stylesheet
├── js/
│   └── main.js      # JavaScript functionality
├── server.js        # Node.js server
├── package.json     # Project dependencies
├── .env             # Environment variables
├── .gitignore       # Git ignore file
├── 404.html         # Custom 404 page
└── README.md        # Project documentation
```

## Technologies Used

- **Frontend:** HTML5, CSS3, and vanilla JavaScript (ES6+)
- **Backend:** Node.js for local development server
- **API:** Flowise AI for chat functionality with streaming responses
- **Design:** Space-inspired design elements:
  - Dark theme with space black backgrounds
  - Minimal UI components
  - Clean, sans-serif typography
  - Subtle animations and transitions

## Setup and Running Locally

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/personal-website.git
   cd personal-website
   ```

2. Install dependencies:
   ```bash
   npm install
   ```

3. Create a `.env` file in the root directory with your API credentials:
   ```
   PORT=8080
   HOST=0.0.0.0
   API_ENDPOINT=your_api_endpoint
   API_TOKEN=your_api_token
   ```

4. Start the development server:
   ```bash
   npm run dev
   ```

5. Open your browser to http://localhost:8080