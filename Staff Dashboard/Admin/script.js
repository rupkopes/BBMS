const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

// -------------------------Show sidebar-----------------------------
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

// --------------------------Close sidebar-------------------------------
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

// -------------------------------Change theme-----------------------------
// Function to apply theme based on stored preference
function applyTheme(theme) {
    if (theme === 'dark') {
        document.body.classList.add('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.add('active');
        themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
    } else {
        document.body.classList.remove('dark-theme-variables');
        themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
        themeToggler.querySelector('span:nth-child(2)').classList.add('active');
    }
}

// Function to toggle between light and dark theme
function toggleTheme() {
    const currentTheme = document.body.classList.contains('dark-theme-variables') ? 'light' : 'dark';
    applyTheme(currentTheme);

    // Update URL with theme parameter only when the theme toggler button is clicked
    const url = new URL(window.location.href);
    url.searchParams.set('theme', currentTheme);
    history.replaceState(null, '', url.toString());

    // Save theme preference in local storage
    localStorage.setItem('theme', currentTheme);
}

// Add event listener for theme toggler
themeToggler.addEventListener('click', toggleTheme);

// Apply the theme based on local storage on page load
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const theme = localStorage.getItem('theme') || urlParams.get('theme') || 'light';
    applyTheme(theme);
});

// -----------------------Fill orders in table------------------------------------
Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
                        <td>${order.orderID}</td>
                        <td>${order.orgName}</td>
                        <td>${order.bloodType}</td>
                        <td>${order.quantity}</td>
                        <td class="${order.status === 'Rejected' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>

                        <td class="primary">Details</td>
                        `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
})