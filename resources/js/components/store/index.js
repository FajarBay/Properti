import Axios from "axios"

export default {
    state: () => ({
        userList: [],
        userMessage: [],
        adminList: []
    }),
    mutations: {
        userList(state, payload) {
            return state.userList = payload
        },
        userMessage(state, payload) {
            return state.userMessage = payload
        },
        adminList(state, payload) {
            return state.userList = payload
        }
    },
    actions: {
        userList(context) {
            Axios.get('/userlist')
                .then(response => {
                    context.commit("userList", response.data);
                })
        },
        userMessage(contex, payload) {
            Axios.get('/usermessage/' + payload)
                .then(response => {
                    contex.commit("userMessage", response.data);
                })
        },
        adminList(context) {
            Axios.get('/adminlist')
                .then(response => {
                    context.commit("adminList", response.data);
                })
        },
    },
    getters: {
        userList(state) {
            return state.userList
        },
        userMessage(state) {
            return state.userMessage
        },
        adminList(state) {
            return state.userList
        }
    }
}