// Theme management functions
const setLightMode = () => {
    localStorage.theme = 'light';
    document.documentElement.classList.remove('dark');
};

const setDarkMode = () => {
    localStorage.theme = 'dark';
    document.documentElement.classList.add('dark');
};

const setSystemMode = () => {
    localStorage.removeItem('theme');
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

// Initialize theme on page load
const initializeTheme = () => {
    // Check if theme is set in localStorage
    const theme = localStorage.theme;
    if (theme === 'dark') {
        setDarkMode();
    } else if (theme === 'light') {
        setLightMode();
    } else {
        setSystemMode();
    }
};

// Listen for system theme changes
const systemThemeListener = window.matchMedia('(prefers-color-scheme: dark)');
systemThemeListener.addListener(({ matches }) => {
    if (!localStorage.theme) {
        if (matches) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', initializeTheme);

// Make functions available globally
window.setLightMode = setLightMode;
window.setDarkMode = setDarkMode;
window.setSystemMode = setSystemMode; 