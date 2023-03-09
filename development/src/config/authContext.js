import { createContext, useCallback, useContext, useMemo, useState } from "react";
import {apiEndpoint} from './apiEndpoint';
const AUTH_KEY = 'user';

export const AuthContext = createContext();

export function AuthContextProvider ({children}){
    const [isAuth, setIsAuth] = useState(window.localStorage.getItem(AUTH_KEY) ?? null);

    const login = useCallback((username, password) => {
        fetch(`../php/auth/auth.php`,{
            method:'POST',
            headers:{
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username,
                password
            })
        })
        .then((response) => response.json())
        .then((response) => {
            console.log('response :>> ', response);
            if(response.Data == null){
                return response.Message;
            }else{
                window.localStorage.setItem(AUTH_KEY, JSON.stringify(response.Data));
                setIsAuth(response.Data);
                return null;
            }
        })
        .catch((error)=>{
            const msg = 'Servicio no disponible.';
            return msg;
        });
    }, []);

    const logout = useCallback(function() {
        window.localStorage.removeItem(AUTH_KEY);
        setIsAuth(null);
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