document.addEventListener('DOMContentLoaded', () => {
    const themeToggleButton = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'dark'; // Default to dark

    const updateButtonText = () => {
        if (document.documentElement.classList.contains('light-mode')) {
            themeToggleButton.textContent = 'DARK MODE';
        } else {
            themeToggleButton.textContent = 'LIGHT MODE';
        }
    };

    // Update button text based on current theme
    updateButtonText();

    // Add event listener for the toggle button
    themeToggleButton.addEventListener('click', () => {
        document.documentElement.classList.toggle('light-mode');
        let theme = document.documentElement.classList.contains('light-mode') ? 'light' : 'dark';
        localStorage.setItem('theme', theme);
        updateButtonText();
    });
}); 