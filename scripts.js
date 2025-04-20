// Theme handling
function initializeTheme() {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;
    const currentTheme = localStorage.getItem('theme') || 'dark';
    
    // Apply theme immediately
    if (currentTheme === 'light') {
        body.classList.add('light-mode');
    } else {
        body.classList.remove('light-mode');
    }
    
    // Update button text
    if (themeToggle) {
        themeToggle.textContent = currentTheme === 'light' ? 'DARK MODE' : 'LIGHT MODE';
        
        // Add click handler
        themeToggle.addEventListener('click', function() {
            body.classList.toggle('light-mode');
            const newTheme = body.classList.contains('light-mode') ? 'light' : 'dark';
            localStorage.setItem('theme', newTheme);
            themeToggle.textContent = newTheme === 'light' ? 'DARK MODE' : 'LIGHT MODE';
        });
    }
}

// Initialize as soon as possible
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeTheme);
} else {
    initializeTheme();
} 