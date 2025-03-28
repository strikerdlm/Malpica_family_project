# SpaceX-Inspired Chat Interface

A minimalist, dark-themed website inspired by SpaceX's design language that integrates with the Flowise API for chat functionality. The interface features a space-themed background, clean typography, and a modern chat component with streaming responses.

![SpaceX-Inspired Chat Interface](https://i.imgur.com/placeholder.png)

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
spacex-chat/
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
- **Design:** SpaceX-inspired design elements:
  - Dark theme with space black backgrounds
  - Minimal UI components
  - Clean, sans-serif typography
  - Subtle animations and transitions

## Setup and Running Locally

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/spacex-chat.git
   cd spacex-chat
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

## API Integration

The project connects to the Flowise AI API for chat functionality. The API provides AI-powered responses to user queries with streaming capabilities for a more interactive experience.

### Available Chatflow IDs

The application supports multiple chatflow IDs for different use cases:

- Drone: `43cfb238-4864-4599-866e-d8ec24235203`
- Aeromedical Certification: `76353477-bb27-4d5d-a634-c2dd87f58e08`
- Researcher: `6c849cad-f383-46d5-adba-45c68c673f76`
- Multi Internet Engine: `498ef381-4141-4d8e-b5e3-bb23839f4c6b`
- STEM Textbook: `8fa13fc3-c011-4300-8781-c910ef207287`
- Flight Surgeon: `dcdb1c81-a027-4876-81bb-5535d22a5bc0`
- 5MCC: `3e400cbb-9c0f-4925-9b4e-d1d51f55d369`
- Physio Cohere RAG: `d0bf0d84-1343-4f3b-a887-780d20f9e3c6`
- ArXiv: `4bcf45ee-a442-4e14-a584-97468c234d9c`
- Zotero: `8bfc57af-2db6-4648-9e8d-57a2e92d2db7`
- CORE: `db3a88bc-b0ce-4ee5-a24a-9eb92f1924fc`
- CrossRef: `db428808-722e-4189-8ade-0740e035219d`
- PubMed: `a497e478-4670-4d43-82d6-1ccbfb842ee2`

## Deployment Options

### GitHub Pages

```bash
# Initialize Git repository
git init
git add .
git commit -m "Initial commit"

# Create gh-pages branch
git checkout -b gh-pages
git push origin gh-pages
```

### Netlify

```bash
# Install Netlify CLI
npm install -g netlify-cli

# Deploy site
netlify deploy
```

### Vercel

```bash
# Install Vercel CLI
npm install -g vercel

# Deploy site
vercel
```

## Browser Compatibility

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## Credits

- UI design inspired by [SpaceX](https://www.spacex.com/)
- Chat API provided by [FlowiseAI](https://flowiseai.com/)
- Star background pattern generated with SVG

## License

MIT License 