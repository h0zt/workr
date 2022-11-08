import { StyleSheet } from 'react-native';


const styles = StyleSheet.create({
    appScreen: {
        paddingTop: 25,
        paddingBottom: 25,
        flex:1,
        height:'100%',
        justifyContent:'center',
        alignItems:'center',
    },
    formView:{
        width:'90%',
        flex:1,
        minHeight:5
    },
    bigText:{
        fontSize: 48,
        fontWeight: '600',
        color:'#0d6efd',
        paddingBottom:10,
    },
    formInput:{
        borderWidth: 1,
        borderColor:'silver',
        marginTop:'5%',
        padding:20,
        borderRadius:4,
        alignItems:'center',
        fontSize:18,
    },
    formBtn:{
        backgroundColor:'#0d6efd',
        borderWidth: 1,
        borderColor:'#0d6efd',
        marginTop:'5%',
        padding:20,
        borderRadius:4,
        alignItems:'center',
        marginBottom:'10%',
        fontSize:18,
    },
    formBtnText:{
        color:'white',
        textAlign:'center',
        fontSize:18,
    },
    msgView:{ width:'90%'},
    msgTouch:{
        backgroundColor:'white',
        borderColor:'silver',
        borderWidth:.5,
        width:'100%',
        marginBottom:'2.5%',
        marginTop:'2.5%',
        padding:20,
        borderRadius:4,
        alignItems:'center',
        fontSize:18,
    },
    nameTouch:{
        backgroundColor:'white',
        borderColor:'silver',
        borderWidth:.5,
        fontSize:18,
        width:'90%',
        marginBottom:'2.5%',
        marginTop:'2.5%',
        padding:20,
        borderRadius:4,
        alignItems:'center',
    },
    touchables:{
        fontSize:18,
        color:'#0d6efd',
    }
});


export { styles }