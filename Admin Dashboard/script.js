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
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

// -----------------------Fill orders in table------------------------------------
Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
                        <td>${order.org_id}</td>
                        <td>${order.org_name}</td>
                        <td>${order.blood_type}</td>
                        <td>${order.quantity}</td>
                        <td class="${order.status === 'Rejected' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>

                        <td class="primary">Details</td>
                        `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
})


//--------------------------------Dropdown sub-menu items in sidebar-------------------------------
        const dropDowns = document.querySelectorAll('.drop_down');
        dropDowns.forEach(dropDown => {
            dropDown.addEventListener('click', function () {
                const subMenu = this.nextElementSibling;
                if (subMenu.style.display === 'block') {
                    subMenu.style.display = 'none';
                } else {
                    subMenu.style.display = 'block';
                }
            });
        });
    