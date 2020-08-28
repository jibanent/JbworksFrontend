const renderMessages = state => {
  let messages = state.messages;
  return messages ? [...messages].reverse()  : [];
};

export default {
  renderMessages
};
