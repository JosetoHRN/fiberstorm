import React from "react";
import { useAuthContext } from "../config/authContext";

export default function Logout() {
  const {logout} = useAuthContext();
  React.useEffect(()=> logout());
  return null;
}
