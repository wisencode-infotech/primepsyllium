const themeStorageKey = 'primepsyllium-theme';
const themeModes = new Set(['light', 'dark']);

function getPreferredTheme() {
    const storedTheme = window.localStorage.getItem(themeStorageKey);

    if (themeModes.has(storedTheme)) {
        return storedTheme;
    }

    return 'light';
}

function applyTheme(theme) {
    document.documentElement.dataset.theme = themeModes.has(theme) ? theme : 'light';
}

export function initializeTheme() {
    applyTheme(getPreferredTheme());
}

export function setTheme(theme) {
    const nextTheme = themeModes.has(theme) ? theme : 'light';

    window.localStorage.setItem(themeStorageKey, nextTheme);
    applyTheme(nextTheme);
}

window.theme = {
    set: setTheme,
    get: getPreferredTheme,
};

initializeTheme();

