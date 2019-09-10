export default class Gate {

    constructor (user){
        this.user =user;
    }
    isAdmin(){
        return this.user.role === 'admin';
    }
    isSubadmin(){
        return this.user.role === 'sub-admin';
    }
    isStudent(){
        return this.user.role === 'student';
    }
    isOfficial(){
        return this.user.role === 'official';
    }
    isAdminOrSubadmin(){
        return this.user.role === 'admin' || this.user.role === 'sub-admin';

    }
}
