import { Navigate, Outlet } from "react-router-dom";
import { useAuthContext } from '../../config/authContext';

export default function PublicRoute() {
    const {isAuth} = useAuthContext();

    if (isAuth){
        return <Navigate to='/home' />;
    }

    return (
        <div>
            <Outlet />
        </div>
    );
}