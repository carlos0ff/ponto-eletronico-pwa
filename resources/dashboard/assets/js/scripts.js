// Sidebar Toggle
const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");

sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

// Menu Handling
const menu = document.querySelector(".menu-content");
const menuItems = document.querySelectorAll(".submenu-item");
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");

    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});

// Date Range Update
document.addEventListener("DOMContentLoaded", () => {
  const dateRange = document.getElementById("date-range");
  const leftArrow = document.getElementById("left-arrow");
  const rightArrow = document.getElementById("right-arrow");
  let startDate = new Date("2020-01-06");

  const updateDateRange = () => {
    const endDate = new Date(startDate);
    endDate.setDate(startDate.getDate() + 6);

    const formatDate = (date) => {
        const options = { month: "short", day: "2-digit", year: "numeric" };
        return date
            .toLocaleDateString("pt-BR", options)
            .replace(", ", "")
            .replace(/de\s/, "");
    };

    dateRange.textContent = `${formatDate(startDate)} - ${formatDate(endDate)}`;
  };

  rightArrow.addEventListener("click", () => {
    startDate.setDate(startDate.getDate() + 7);
    updateDateRange();
  });

  leftArrow.addEventListener("click", () => {
    startDate.setDate(startDate.getDate() - 7);
    updateDateRange();
  });

  updateDateRange();
});

// Select All Checkboxes
function selectAllCheckboxes() {
  const selectAllCheckbox = document.getElementById('selectAll');
  const checkboxes = document.querySelectorAll('.selectRow');

  checkboxes.forEach(function(checkbox) {
    checkbox.checked = selectAllCheckbox.checked;
  });
}

// Sidebar Open/Close
document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("open-sidebar").addEventListener("click", function () {
    document.getElementById("absence-sidebar").classList.add("active");
  });

  document.getElementById("close-sidebar").addEventListener("click", function () {
    document.getElementById("absence-sidebar").classList.remove("active");
  });
});

// Tabs Functionality
document.addEventListener("DOMContentLoaded", function() {
  const tabs = document.querySelectorAll('.tab');
  tabs.forEach(tab => tab.style.display = 'none');
  tabs[0].style.display = 'block';

  const tabLinks = document.querySelectorAll('.tab-link');
  tabLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      tabs.forEach(tab => tab.style.display = 'none');

      const targetTabId = link.getAttribute('href').substring(1);
      const targetTab = document.getElementById(targetTabId);

      if (targetTab) {
        targetTab.style.display = 'block';
      }
    });
  });
});

// Filters Application
document.addEventListener("DOMContentLoaded", () => {
  const filterCheckboxes = document.querySelectorAll(".filter-checkbox");
  const applyButton = document.querySelector(".apply-button");
  const table = document.getElementById("collaborators-table");
  const rows = table.querySelectorAll("tbody tr");

  applyButton.addEventListener("click", () => {
    const selectedFilters = Array.from(filterCheckboxes)
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => checkbox.value);

    rows.forEach((row) => {
      const statusCell = row.querySelector("td:last-child p span").textContent.trim();
      if (selectedFilters.length === 0 || selectedFilters.includes(statusCell)) {
        row.style.display = ""; 
      } else {
        row.style.display = "none"; 
      }
    });
  });
});

// Tolerance Toggle
document.getElementById('toggle-tolerance').addEventListener('change', function () {
  const fields = document.querySelectorAll('.tolerance-fields');
  const saveButton = document.querySelector('.form-actions');
  
  fields.forEach(field => {
    if (this.checked) {
      field.classList.add('visible');
    } else {
      field.classList.remove('visible');
    }
  });

  if (this.checked) {
    saveButton.classList.add('visible');
  } else {
    saveButton.classList.remove('visible');
  }
});

// Random Color for Name Elements
function generateRandomColor() {
  const letters = '0123456789ABCDEF';
  let color = '#';
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

for (let i = 0; i < 8; i++) {
  const nameElement = document.getElementById(`name-${i}`);
  nameElement.style.color = generateRandomColor();
}

// Notification Toggle
document.getElementById("bellIconWrapper").addEventListener("click", function() {
  const notificationContent = document.querySelector(".notification_content");
  notificationContent.style.display = notificationContent.style.display === "none" ? "block" : "none";
});

// Menu Item Activation
function setActiveMenuItem(event, id) {
  const items = document.querySelectorAll('.item');
  const clickedItem = document.getElementById(id);

  items.forEach(item => item.classList.remove('active'));
  clickedItem.classList.add('active');
}

// Dynamic Tab Opening
function openTab(event, tabName, tabTitle) {
  const tabContents = document.querySelectorAll('.tab-content');
  const tabLinks = document.querySelectorAll('.tab-link');
  const indicator = document.querySelector('.tab-indicator');
  const headerTitle = document.getElementById('header-title');

  tabContents.forEach(content => content.classList.remove('active'));
  tabLinks.forEach(link => link.classList.remove('active'));

  document.getElementById(tabName).classList.add('active');
  event.currentTarget.classList.add('active');
  headerTitle.textContent = tabTitle;

  const tabIndex = Array.from(tabLinks).indexOf(event.currentTarget);
  const tabWidth = event.currentTarget.offsetWidth;
  const tabOffset = event.currentTarget.offsetLeft;

  indicator.style.transform = `translateX(${tabOffset}px)`;
  indicator.style.width = `${tabWidth}px`;
}

// Dynamic Title Update
function updateDynamicTitle(newTitle) {
  const dynamicElement = document.getElementById('dynamic');
  
  dynamicElement.textContent = newTitle;
  dynamicElement.classList.add('updated');
  setTimeout(() => dynamicElement.classList.remove('updated'), 1000);
}

// Adding New Tab
function addNewTab() {
  const newTabName = `tab_${Date.now()}`;
  const newTabButton = document.createElement('button');
  const newTabContent = document.createElement('div');
  const tabsContainer = document.querySelector('.tabs');
  const headerTitle = document.getElementById('header-title');
  const tabTitle = `Nova Aba ${Date.now().toString().slice(-4)}`;

  newTabButton.className = 'tab-link';
  newTabButton.textContent = `Nova Aba`;
  newTabButton.setAttribute('onclick', `openTab(event, '${newTabName}', '${tabTitle}')`);

  newTabContent.id = newTabName;
  newTabContent.className = 'tab-content';
  newTabContent.textContent = `ConteÃºdo: ${tabTitle}`;

  tabsContainer.insertBefore(newTabButton, tabsContainer.querySelector('.tab-link:last-child'));
  document.querySelector('.container').appendChild(newTabContent);

  headerTitle.textContent = `${tabTitle}`;
}

// Initial Tab Indicator Update
document.addEventListener('DOMContentLoaded', () => {
  const firstTab = document.querySelector('.tab-link.active');
  updateIndicator(firstTab);
});

// Notification Count
let notificationCount = 0; 
const maxNotifications = 100;

document.getElementById("bellIconWrapper").addEventListener("click", function() {
  const notificationContent = document.querySelector(".notification_content");
  notificationContent.style.display = notificationContent.style.display === "none" ? "block" : "none";

  document.getElementById("notificationCounter").textContent = notificationCount > maxNotifications ? '99+' : notificationCount;
  notificationCount = 0;
});

// Dropdown Menu Toggle
document.querySelector('.dropdown-toggle').addEventListener('click', function (e) {
  e.stopPropagation();
  const menu = this.nextElementSibling;
  menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', function () {
  const dropdownMenus = document.querySelectorAll('.dropdown-menu');
  dropdownMenus.forEach((menu) => (menu.style.display = 'none'));
});

// Popup Handling
document.querySelectorAll('.open-popup').forEach((item) => {
  item.addEventListener('click', function (e) {
    e.preventDefault();
    const popup = document.getElementById('popup');
    popup.classList.remove('hidden');
  });
});

document.querySelector('.close-popup').addEventListener('click', function () {
  document.getElementById('popup').classList.add('hidden');
});

document.getElementById('popup').addEventListener('click', function (e) {
  if (e.target === this) {
    this.classList.add('hidden');
  }
});


document.getElementById('showNotification').addEventListener('click', function() {
  createNotification('Nova Mensagem', 'VocÃª recebeu uma mensagem de JohnDoe.');
});

function createNotification(title, message) {
const notificationContainer = document.getElementById('notificationContainer');

// Cria a notificaÃ§Ã£o
const notification = document.createElement('div');
notification.classList.add('notification');

// Ãcone da notificaÃ§Ã£o
const icon = document.createElement('div');
icon.classList.add('notification-icon');
icon.textContent = '!'; // Pode ser um Ã­cone ou emoji
notification.appendChild(icon);

// ConteÃºdo da notificaÃ§Ã£o
const content = document.createElement('div');
content.classList.add('notification-content');

const notificationTitle = document.createElement('div');
notificationTitle.classList.add('notification-title');
notificationTitle.textContent = title;

const notificationMessage = document.createElement('div');
notificationMessage.classList.add('notification-message');
notificationMessage.textContent = message;

content.appendChild(notificationTitle);
content.appendChild(notificationMessage);
notification.appendChild(content);

// Adiciona a notificaÃ§Ã£o ao container
notificationContainer.appendChild(notification);

// Remove a notificaÃ§Ã£o apÃ³s 5 segundos
setTimeout(() => {
  notification.remove();
}, 5000);
}