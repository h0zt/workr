import  React, { useState, useEffect} from 'react';
import { Text,TouchableOpacity,ScrollView,StatusBar,ToastAndroid} from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';
import { styles } from '.././style';
//firestore 
import { db } from '../firebase/firebase-config';
import { onSnapshot,collection,setDoc,doc} from 'firebase/firestore';

export default function NameScreen() {


  /**states */
  const [usernames,setUsernames] = useState([]);


  /**
   * push the data to cloud firebase */
  const fingerPrint = async(identification,firstname,id)=>{
    const fireRef = collection(db, "attendance");
    await setDoc(doc(fireRef, `biometrics`), {
      name: identification,
      firstname: firstname,
      id:id
    });
    ToastAndroid.show(`${firstname} : attended today!`, ToastAndroid.SHORT);
  }


  /**
   * on snapshot so that when data  
   * changes it should update automatically */
  useEffect(
    () => 
      onSnapshot(collection(db,"identity"), (snapshot) =>
        setUsernames(snapshot.docs.map( (doc) => doc.data()))
      ),
    []
  );
  

  /**
   * replaced firstname with identification for sending data */
  return (
    <ScrollView>
      <SafeAreaView style={styles.appScreen}>
        <StatusBar animated={true} backgroundColor="#0d6efd" />

        {usernames.map((value) => (
        <TouchableOpacity style={styles.nameTouch}
           onPress={() =>fingerPrint(value.identification,value.firstname,value.id)}> 
          <Text style={styles.touchables}>
            {value.firstname} - {value.identification} {value.id}
          </Text>
        </TouchableOpacity>
        ))}
        
      </SafeAreaView>
    </ScrollView>
  );

} 
