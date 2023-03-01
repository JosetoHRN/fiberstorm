import { useState } from "react";

function Home(props) {
    console.log('props :>> ', props);
    return (
        <>
            <p>Home for user: {JSON.stringify(props.user)}</p>
            <button onClick={() => {setUser(null);}} value="Cerrar sesion"/>
        </>
    );
}
  
export default Home;