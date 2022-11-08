import React,{useRef,useState} from 'react';
import { Text, View, TouchableOpacity, StatusBar,  ScrollView, ToastAndroid} from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import { styles } from '../style';
//firebase
import { authentication,db } from '../firebase/firebase-config';
import { signOut} from 'firebase/auth';
import { collection, doc, setDoc } from "firebase/firestore"; 
//email libray
import email from 'react-native-email'

export default function SignOut({navigation}) {
  /**
   * recieve functional parameters
   * to the useState */
   const [message,setMessage] = useState('');


  /**
   * get back to the home page
   * after button is clicked */
  const handleSignout = async() =>{
    signOut(authentication).then(() => {
      ToastAndroid.show("Log Out!", ToastAndroid.SHORT);
    }).catch((error) => {});
  }


  /** 
   * send cloud functions emails to all the users
   * on some message parameter */
  const sendEmail = (message) =>{
    const to = ['peter16matewere@gmai.com'] // string or array of email addresses
    email(to, {
        // Optional additional arguments
        subject: 'Supervisor Message to Admin',
        body: message,
        checkCanOpen: false // Call Linking.canOpenURL prior to Linking.openURL
    }).catch(console.error)
    ToastAndroid.show("Alert Continue to Email Send!", ToastAndroid.SHORT);
  }
    

  return (
    <SafeAreaView style={styles.appScreen}>
      <StatusBar animated={true} backgroundColor="#0d6efd" />

      <View style={styles.formView}>
        <TouchableOpacity style={styles.formBtn} onPress={handleSignout}>
          <Text style={styles.formBtnText}>Signout</Text>
        </TouchableOpacity>
        <Text color="gray">send,  ALERT</Text>
      </View>

      <ScrollView style={styles.msgView}>
        <TouchableOpacity style={styles.msgTouch}
           onPress={() =>sendEmail("we need backup.......")}> 
           <Text style={styles.touchables}>backup</Text>
        </TouchableOpacity>

        <TouchableOpacity style={styles.msgTouch}
           onPress={() =>sendEmail("timeout for break......")}> 
           <Text style={styles.touchables}>timeout</Text>
        </TouchableOpacity>

        <TouchableOpacity style={styles.msgTouch}
           onPress={() =>sendEmail("all supervisors needed for meeting.......")}> 
           <Text style={styles.touchables}>meeting</Text>
        </TouchableOpacity>
      </ScrollView>

    </SafeAreaView>
  );

}