import React,{useEffect, useState} from 'react';
import { Text, View,ScrollView, TextInput, StatusBar, TouchableOpacity,
  ToastAndroid} from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import { styles } from '../style';
//firebase
import { authentication,db} from '../firebase/firebase-config';
import { createUserWithEmailAndPassword } from 'firebase/auth';
import { collection, doc, setDoc } from "firebase/firestore"; 

 
export default function RegisterScreen({navigation}) {
  
  //text input states
  const [email,setEmail] = useState('');
  const [password,setPassword] = useState('');
  const [name,setName] = useState('');

  /**
   * FIREBASE REGISTRATION
  */
  const RegisterUser = ()=>{
    createUserWithEmailAndPassword(authentication, email, password)
      .then((userCredential) => {
        //push to the firebase collection
        const user = userCredential.user;
        (functioned = async()=>{
          const fireRef = collection(db, "users");
          await setDoc(doc(fireRef), {
            email: user.email,
            uid: user.uid,
            name:name
          })
        })();
        //
        ToastAndroid.show("Registered Successfully",
          ToastAndroid.SHORT);
      })
      .catch((error) => {
        ToastAndroid.show("fail :try again", ToastAndroid.SHORT);
      });
  }

  return (
    <ScrollView>
      <SafeAreaView style={styles.appScreen}>
        <StatusBar animated={true} backgroundColor="#0d6efd" />

        <View style={styles.formView}>

          <TextInput style={styles.formInput} placeholder='email'
              value={email} onChangeText={text=>setEmail(text)} />

          <TextInput style={styles.formInput} placeholder='password' 
              value={password} onChangeText={text=>setPassword(text)} />

          <TextInput style={styles.formInput} placeholder='name' 
              value={name} onChangeText={text=>setName(text)} />

          <TouchableOpacity style={styles.formBtn} onPress={RegisterUser}>
            <Text style={styles.formBtnText}>Google Register</Text>
          </TouchableOpacity>

        </View>

      </SafeAreaView>
    </ScrollView>
  );

}
 
