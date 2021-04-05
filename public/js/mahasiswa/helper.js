function updateToken() {
  const login = {
    status_login: false,
    role: null,
    jwt: null
  }

  // simpan token dan role ke local storage
  window.localStorage.setItem('login', JSON.stringify(login));
}