document.addEventListener('DOMContentLoaded', function () {
    const root = document.documentElement;
    const button = document.getElementById('hcmv-theme-toggle');

    if (!button) return;

    const text = button.querySelector('.hcmv-theme-toggle__text');
    const icon = button.querySelector('.hcmv-theme-toggle__icon');

    const getSavedTheme = () => {
        try {
            return localStorage.getItem('hcmv-theme');
        } catch (e) {
            return null;
        }
    };

    const getCurrentTheme = () => {
        return root.getAttribute('data-theme') || 'light';
    };

    const updateButton = (theme) => {
        const isDark = theme === 'dark';

        if (text) {
            text.textContent = isDark ? 'Light mode' : 'Dark mode';
        }

        if (icon) {
            icon.textContent = isDark ? '\u2600\uFE0F' : '\uD83C\uDF19';
        }

        button.setAttribute('aria-pressed', isDark ? 'true' : 'false');
        button.setAttribute(
            'aria-label',
            isDark ? 'Switch to light theme' : 'Switch to dark theme'
        );
    };

    const applyTheme = (theme, persist = true) => {
        root.setAttribute('data-theme', theme);

        if (persist) {
            try {
                localStorage.setItem('hcmv-theme', theme);
            } catch (e) {}
        }

        updateButton(theme);
    };

    updateButton(getCurrentTheme());

    button.addEventListener('click', function () {
        const nextTheme = getCurrentTheme() === 'dark' ? 'light' : 'dark';
        applyTheme(nextTheme, true);
    });

    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

    const handleSystemThemeChange = (event) => {
        const savedTheme = getSavedTheme();

        if (!savedTheme) {
            applyTheme(event.matches ? 'dark' : 'light', false);
        }
    };

    if (typeof mediaQuery.addEventListener === 'function') {
        mediaQuery.addEventListener('change', handleSystemThemeChange);
    } else if (typeof mediaQuery.addListener === 'function') {
        mediaQuery.addListener(handleSystemThemeChange);
    }
});