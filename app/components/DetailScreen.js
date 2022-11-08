import React,{useState} from 'react';
import { Text, View, ScrollView,TextInput,StatusBar,TouchableOpacity, ToastAndroid } from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import { styles } from '.././style';
//firestore 
import { db } from '../firebase/firebase-config';
import { onSnapshot,collection,setDoc,doc} from 'firebase/firestore';

 
export default function DetailScreen() {

  /** make details about the customers */
  const [customerName,setCustomerName] = useState('');
  const [contact,setContact] = useState('');
  const [address,setAddress] = useState('');


  const SendData = async()=>{
    console.log("...");
    const fireRef = doc(db,`detail/client`);
    //
    const docData ={
        name:customerName,
        contact:contact,
        address:address
    };
    //
    try{
        await setDoc(fireRef, docData, { merge:true });
        ToastAndroid.show("details sent successfully!", ToastAndroid.SHORT);
    } catch(error) {
        ToastAndroid.show("failed to send!", ToastAndroid.SHORT);
    }
  }


  return (
    <ScrollView>
      <SafeAreaView style={styles.appScreen}>
        <StatusBar animated={true} backgroundColor="#0d6efd" />

        <View style={styles.formView}>
          <TextInput style={styles.formInput} placeholder='customer name' 
              value={customerName} 
              onChangeText={text=>setCustomerName(text)} />
          <TextInput style={styles.formInput} placeholder='contact' 
              value={contact} 
              onChangeText={text=>setContact(text)} />
          <TextInput style={styles.formInput} placeholder='address' 
              value={address} 
              onChangeText={text=>setAddress(text)} />
          <TouchableOpacity style={styles.formBtn} onPress={SendData}>
            <Text style={styles.formBtnText}>Add Customer</Text>
          </TouchableOpacity>
        </View>

      </SafeAreaView>
    </ScrollView>
  );

}
 
 
