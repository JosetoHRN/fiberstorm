import React, { useState } from "react";
import { useAuthContext } from "../config/authContext";
import '../assets/css/login.css';

export default function Login() {
  const {login} = useAuthContext();
  const [username, setUsername] = useState(localStorage.getItem('remember_username') || "");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(localStorage.getItem('remember') === 'true');
  const [error, setError] = useState('');

  const handleSubmit = async(e) => {
    e.preventDefault();
    if(remember) localStorage.setItem('remember_username', username);
    else localStorage.removeItem('remember_username');
    // login(username, password);
    const msg = await login(username, password);
    console.log('msg :>> ', msg);
    msg ? setError('') : setError(msg);
  };

  return (
    <div className="loginContainer">
      <form onSubmit={handleSubmit} id="loginForm">
        <h2>Acceso privado</h2>
        <div className="input_group">
          <label htmlFor="username">Usuario: </label>
          <input type="text" required
            name="username"
            autoComplete="username"
            value={username}
            placeholder="Usuario"
            onChange={({ target }) => setUsername(target.value)}
          />
        </div>
        <div className="input_group">
          <label htmlFor="password">Contraseña: </label>
          <input type="password" required
            name="password"
            autoComplete="current-password"
            value={password}
            placeholder="Contraseña"
            onChange={({ target }) => setPassword(target.value)}
          />
        </div>
        <div className="remember">
          <input type="checkbox"
            name="remember"
            checked={remember}
            onChange={(e) => {
                localStorage.setItem('remember',`${e.target.checked}`);
                setRemember(e.target.checked);
              }
            }
          />
          <label htmlFor="remember">Recordar este usuario</label>
        </div>
        <input type="submit" value="Acceder" />
        <p className="error-message">{error}</p>
      </form>
    </div>
  );
}
