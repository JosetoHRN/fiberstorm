import React, { useState } from "react";
import { useAuthContext } from "../config/authContext";

export default function Login() {
  const {login} = useAuthContext();
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(localStorage.getItem('remember') === 'true');

  const handleSubmit = async(e) => {
    e.preventDefault();
    login(username, password);
  };

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="username">Usuario: </label>
      <input
        name="username"
        autoComplete="username"
        type="text"
        value={username}
        placeholder="Usuario"
        onChange={({ target }) => setUsername(target.value)}
        required
      />
      <div>
        <label htmlFor="password">Contraseña: </label>
        <input
          name="password"
          autoComplete="current-password"
          type="password"
          value={password}
          placeholder="Contraseña"
          onChange={({ target }) => setPassword(target.value)}
          required
        />
      </div>
      <div>
        <input
          name="remember"
          type="checkbox"
          checked={remember}
          onChange={(e) => {
              localStorage.setItem('remember',`${e.target.checked}`);
              setRemember(e.target.checked);
            }
          }
        />
        <label htmlFor="remember">Recordar este usuario</label>
      </div>
      <button type="submit">Acceder</button>
    </form>
  );
}
