export const SET_COFFEE = 'SET_COFFEE';
export const CANCEL_COFFEE = 'CANCEL_COFFEE';
export const SET_COMMAND_CALL = 'SET_COMMAND_CALL';
export const SET_COMMAND_PROCESS = 'SET_COMMAND_PROCESS';
export const SET_COMMAND_SEND = 'SET_COMMAND_SEND';

export const state = {
    selected: null,
    commandCall: false,
    commandProcess: false,
    commandSend: false
}


export const mutations = {
    SET_COFFEE(state, coffee) {
        state.selected = coffee
    },
    SET_COMMAND_PROCESS(state) {
        state.commandCall = true
        state.commandProcess = true
        state.commandSend = false
    },
    SET_COMMAND_SEND(state) {
        state.commandCall = true
        state.commandProcess = false
        state.commandSend = true
    },
    CANCEL_COFFEE(state) {
        state.selected = null
        state.commandCall = false
        state.commandProcess = false
        state.commandSend = false
    }
}

export const actions = {
    addCoffee(context, coffee) {
        context.commit(SET_COFFEE, coffee)
    },
    cancelCoffee(context) {
        context.commit(CANCEL_COFFEE)
    },
    addCommandProcess(context) {
        context.commit(SET_COMMAND_PROCESS)
    },
    addCommandSend(context) {
        context.commit(SET_COMMAND_SEND)
    }
}

export const getters = {
    getCoffee: state => state.selected,
    isCommandProcess: state => state.commandProcess,
    isCommandSend: state => state.commandSend,
    isCommandCall: state => state.commandCall,
}

export default {
    state,
    actions,
    mutations,
    getters
};
