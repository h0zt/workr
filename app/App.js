import * as React from 'react';
import {View,Text} from 'react-native';
import { useState, useEffect } from 'react';
import MaterialIcons from 'react-native-vector-icons/MaterialIcons';
//navigation
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
//screens
import LoginScreen from './components/LoginScreen';
import DetailScreen from './components/DetailScreen';
import NameScreen from './components/NameScreen';
import RegisterScreen from './components/RegisterScreen';
import SignOut from './components/Signout';
//hooks for login navigation
import { authentication } from './firebase/firebase-config';


const Stack = createNativeStackNavigator();
const Tab = createBottomTabNavigator();


export default function App() {
  /**
   * SWITCH BETWEEN THE LOGGED IN USERS
   */
  const[currentUser,setCurrentUser] = useState(null)
  

  const userHandler = user =>{
    user ? setCurrentUser(user): setCurrentUser(null);
  }

  useEffect(
    () => authentication.onAuthStateChanged(
      user =>userHandler(user)
    ),[]
  );

  
  return <>{ currentUser ? <LogoutUser/>: <LoginUser/>  }</>
    
}




export function LogoutUser() {

  return (
    <NavigationContainer>
      <Tab.Navigator screenOptions={{headerShown: false}}>

        <Tab.Screen name="Home" component={SignOut} options={{
          tabBarIcon: ({ color, size }) => (
            <MaterialIcons name="home" color={color} size={size} />
          ),
        }} />


        <Tab.Screen name="Detail" component={DetailScreen} options={{
          tabBarIcon: ({ color, size }) => (
            <MaterialIcons name="person-pin-circle" color={color} size={size} />
          ),
        }} />

        <Tab.Screen name="Guard" component={NameScreen} options={{
          tabBarIcon: ({ color, size }) => (
            <MaterialIcons name="fingerprint" color={color} size={size} />
          ),
        }} />
        
      </Tab.Navigator>
    </NavigationContainer>
  );
    
}
  
export function LoginUser() {
  
    return (
      <NavigationContainer>
        <Tab.Navigator screenOptions={{headerShown: false}}>
          <Tab.Screen name="Login" component={LoginScreen} options={{
            tabBarIcon: ({ color, size }) => (
              <MaterialIcons name="lock" color={color} size={size} />
            ),
          }} />

          <Tab.Screen name="Register" component={RegisterScreen} options={{
            tabBarIcon: ({ color, size }) => (
              <MaterialIcons name="person-add-alt" color={color} size={size} />
            ),
          }} />
          
        </Tab.Navigator>
      </NavigationContainer>
    );
    
}