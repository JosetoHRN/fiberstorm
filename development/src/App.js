import React, { useState } from "react";
import './App.css';
import Home from './screens/Home';

function App() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [remember, setRemember] = useState(localStorage.getItem('remember') === 'true');
  const [error, setError] = useState("");

  const [user, setUser] = useState(undefined);

  const handleSubmit = async(e) => {
    e.preventDefault();
    fetch('./php/auth.php',{
      method:'POST',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({username, password})
  })
    .then((response)=>response.json())
    .then((response)=>{
      console.log('response :>> ', JSON.stringify(response));
      console.log(response[0].Message);
      setUser(response[0].Data);
    })
    .catch((error)=>{
        console.log("Error Occured" + error);
        setError(error);
    });
  };
  
  if (user) {
    return <Home user={user}/>
  }

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="username">Usuario: </label>
      <input
        autoComplete="username"
        type="text"
        value={username}
        placeholder="Usuario"
        onChange={({ target }) => setUsername(target.value)}
      />
      <div>
        <label htmlFor="password">Contraseña: </label>
        <input
          autoComplete="current-password"
          type="password"
          value={password}
          placeholder="Contraseña"
          onChange={({ target }) => setPassword(target.value)}
        />
      </div>
      <div>
        <input
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
      <p>{error}</p>
    </form>
  );
}

export default App;
