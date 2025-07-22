async function fetchUsers() {
  const res = await fetch("api/read.php");
  const users = await res.json();
  const table = document.getElementById("userTable");
  table.innerHTML = `<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>`;
  users.forEach(user => {
    table.innerHTML += `
      <tr>
        <td>${user.id}</td>
        <td><input value="${user.name}" onchange="editName(${user.id}, this.value)" /></td>
        <td><input value="${user.email}" onchange="editEmail(${user.id}, this.value)" /></td>
        <td><button onclick="deleteUser(${user.id})">Delete</button></td>
      </tr>
    `;
  });
}

async function addUser() {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  await fetch("api/create.php", {
    method: "POST",
    body: JSON.stringify({ name, email })
  });
  fetchUsers();
}

async function editName(id, name) {
  const email = document.querySelector(`tr td:nth-child(3) input`).value;
  await updateUser(id, name, email);
}

async function editEmail(id, email) {
  const name = document.querySelector(`tr td:nth-child(2) input`).value;
  await updateUser(id, name, email);
}

async function updateUser(id, name, email) {
  await fetch("api/update.php", {
    method: "POST",
    body: JSON.stringify({ id, name, email })
  });
  fetchUsers();
}

async function deleteUser(id) {
  await fetch("api/delete.php", {
    method: "POST",
    body: JSON.stringify({ id })
  });
  fetchUsers();
}

window.onload = fetchUsers;