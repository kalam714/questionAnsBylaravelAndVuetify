import AppStorage from './AppStorage'
import Token from './Token'

class User{

    Login(data){
        axios.post('/api/auth/login',data)
        .then(response =>this.responseAfterLogin(response))
        .catch((error)=>{
          console.log(error)
        })

      }
      responseAfterLogin(response){
          const access_token=response.data.access_token
          const name=response.data.user
          if(Token.isValid(access_token)){
              AppStorage.store(name,access_token)
              window.location='/forum'

          }
      }
      hasToken(){
          const isStoreToken=AppStorage.getToken()
          if(isStoreToken){
              return Token.isValid(isStoreToken) ? true: false
          }
          return false
      }
      LoggedIn(){
          return this.hasToken()
      }
      Logout(){
          AppStorage.clear()
          window.location='/forum'
      }
      name(){
          if(this.LoggedIn()){
            return AppStorage.getUser()
          }
          
      }
      id(){
          if(this.LoggedIn()){
              const paylaod=Token.payload(AppStorage.getToken())
              return paylaod.sub
          }

      }
      own(id){
          return this.id() ==id
      }
}
export default User=new User()