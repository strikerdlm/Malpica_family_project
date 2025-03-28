# Remote Server Terminal Interface (Standalone Version)

This is a standalone version of the Remote Server Terminal interface that can be run directly in a browser without requiring a Node.js server.

## How to Use

1. Simply double-click the `test.html` file to open it in your default browser
2. Alternatively, run the `open_chat.bat` file (Windows) to open the interface

## Features

- Dark, minimalist UI with space-themed elements
- Material Design Icons for a clean, modern look
- Feature cards highlighting key capabilities
- Remote server connection with streaming responses
- Command history context for more relevant responses
- Responsive design for all device sizes
- Real-time typing indicators
- Markdown-like text formatting
- Error handling for server requests

## Setup Instructions

### Material Icons Setup

The interface uses Material Icons for a clean, consistent look. To ensure the icons display correctly:

1. Download the Material Icons font files:
   - MaterialIcons-Regular.woff2
   - MaterialIcons-Regular.woff
   - MaterialIcons-Regular.ttf

2. Place these files in the `icons` directory in the project root

You can download these files from the [Material Design Icons GitHub repository](https://github.com/google/material-design-icons/tree/master/font).

## API Integration

The interface connects to a remote server for command processing. The server provides responses to user commands with streaming capabilities for a more interactive experience.

### Available Server Endpoints

You can modify the server endpoint in the JavaScript section of the HTML file to connect to different servers:

- Default: `43cfb238-4864-4599-866e-d8ec24235203`
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

## Browser Compatibility

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## Credits

- UI design inspired by modern space technology interfaces
- Material Design Icons by Google
- Star background pattern generated with SVG 