import React,{useState , useEffect} from 'react';
import { Text, ScrollView ,View, TextInput,TouchableOpacity ,StatusBar ,ToastAndroid} from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import { styles } from '../style';
//firebase
import { authentication } from '../firebase/firebase-config';
import { signInWithEmailAndPassword } from 'firebase/auth';



export default function LoginScreen({navigation}) {

  //text input states
  const [email,setEmail] = useState('');
  const [password,setPassword] = useState('');


  /**
   * FIREBASE LOGIN SOME REDIRECTION INIT
  **/
  const SignInUser = () =>{
    signInWithEmailAndPassword(authentication, email, password)
      .then((userCredential) => { 
        const user = userCredential.user;
        ToastAndroid.show(`loged in as ${user.email} !`, ToastAndroid.SHORT);
      }).catch((error) => {
        ToastAndroid.show("log in fail!", ToastAndroid.SHORT);
      });
  }


  return (
    <ScrollView>
      <SafeAreaView style={styles.appScreen}>
        <StatusBar animated={true} backgroundColor="#0d6efd" />

        <View style={styles.formView}>
          <Text style={styles.bigText}>Get...{'\n'}  Started.</Text>

          <TextInput style={styles.formInput} placeholder='email'
              value={email} 
              onChangeText={text=>setEmail(text)} />

          <TextInput style={styles.formInput} placeholder='password'
              secureTextEntry={true} value={password}
              onChangeText={text=>setPassword(text)} />

          <TouchableOpacity style={styles.formBtn} onPress={SignInUser}>
            <Text style={styles.formBtnText}>Google Login</Text>
          </TouchableOpacity>
        </View>

      </SafeAreaView>
    </ScrollView>
  );

}