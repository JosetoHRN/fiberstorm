const React = require("react");
require('./App.css');
const Home = require('./screens/Home');
function App() {
  const [username, setUsername] = React.useState("");
  const [password, setPassword] = React.useState("");
  const [remember, setRemember] = React.useState(false);
  const [user, setUser] = React.useState()

  const handleSubmit = async(e) => {
    e.preventDefault();
    fetch(`./src/php/auth.php`,{
      method:'POST',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({username, password}) //convert data to JSON
  })
    .then((response)=>response.json())
    .then((response)=>{
      console.log(response[0].Message);
    })
    .catch((error)=>{
        console.log("Error Occured" + error);
    });
  };
  
  // if (user) {
  //   return (<Home />);
  // }

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="username">Username: </label>
      <input
        type="text"
        value={username}
        placeholder="enter a username"
        onChange={({ target }) => setUsername(target.value)}
      />
      <div>
        <label htmlFor="password">password: </label>
        <input
          type="password"
          value={password}
          placeholder="enter a password"
          onChange={({ target }) => setPassword(target.value)}
        />
      </div>
      <button type="submit">Login</button>
    </form>
  );
}

export default App;
