/** =================================================================================
    CONVERSATIONS MUTATIONS
  =================================================================================*/

const OPEN_TAB_CONVERSATIONS = state => {
  (state.openTabConversations = true), (state.openTabUsers = false);
};

const OPEN_TAB_USERS = state => {
  (state.openTabConversations = false), (state.openTabUsers = true);
};

const SET_CONVERSATIONS = (state, conversations) => {
  state.currentPage = conversations.meta.current_page;
  state.lastPage = conversations.meta.last_page;
  if (state.currentPage === 1) {
    state.conversations = conversations.data;
  } else {
    state.conversations = [...state.conversations, ...conversations.data];
  }
};

const SET_CONVERSATION = (state, conversation) => {
  state.conversation = conversation;
};

const SET_NEW_CONVERSATION = (state, conversation) => {
  let data = state.conversations;
  const found = data.some(item => item.id === conversation.id);
  let newConversation;
  if (!found) {
    data.unshift(conversation);
  } else {
    data = data.map(item => {
      if (item.id === conversation.id) {
        return { ...item, ...conversation };
      } else {
        return { ...item };
      }
    });
  }

  state.conversations = data;
};

const SET_RECEIVER = (state, receiver) => {
  state.receiver = receiver;
};

const TOGGLE_EDIT_CONVERSATION = state => {
  if (state.conversation.name) {
    state.openEditConversation = !state.openEditConversation;
  }
};

const UPDATE_CONVERSATION = (state, data) => {
  const { conversations } = state;
  const newConversation = conversations.map(item => {
    if (item.id === data.id) {
      return { ...item, ...data };
    } else {
      return { ...item };
    }
  });
  state.conversation = data;
  state.conversations = newConversation;
};

export default {
  OPEN_TAB_CONVERSATIONS,
  OPEN_TAB_USERS,
  SET_CONVERSATIONS,
  SET_CONVERSATION,
  SET_RECEIVER,
  SET_NEW_CONVERSATION,
  TOGGLE_EDIT_CONVERSATION,
  UPDATE_CONVERSATION
};
