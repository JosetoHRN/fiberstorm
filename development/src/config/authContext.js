import { createContext, useCallback, useContext, useMemo, useState } from "react";
const AUTH_KEY = 'auth_key_1';

export const AuthContext = createContext();

export function AuthContextProvider ({children}){
    const [isAuth, setIsAuth] = useState(window.localStorage.getItem(AUTH_KEY) ?? false);

    const login = useCallback(function(username, password) {
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
            window.localStorage.setItem(AUTH_KEY, true);
            setIsAuth(true);
        })
        .catch((error)=>{
            console.log("Error Occured" + error);
        });
    }, []);

    const logout = useCallback(function() {
        window.localStorage.removeItem(AUTH_KEY);
        setIsAuth(false);
    }, []);

    const value = useMemo(() => ({
        login,
        logout,
        isAuth
    }), [login, logout, isAuth]);

    return (
        <AuthContext.Provider value={value}>
            {children}
        </AuthContext.Provider>
    );
}

export function useAuthContext(){
    return useContext(AuthContext);
}