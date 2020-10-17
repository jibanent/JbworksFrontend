const SET_DOCUMENT = (state, documents) => {
  state.documents = documents;
};

const TOGGLE_ADD_NEW_FOLDER_DIALOG = state => {
  state.showAddNewFolderDialog = !state.showAddNewFolderDialog;
};

const CLOSE_ADD_NEW_FOLDER_DIALOG = state => {
  state.showAddNewFolderDialog = false;
};

const SHOW_DOCUMENT_ACTIONS_DIALOG = (state, document) => {
  state.showDocumentActionsDialog = true;
  state.document = document;
};

const HIDE_DOCUMENT_ACTIONS_DIALOG = state => {
  state.showDocumentActionsDialog = false;
  state.document = {};
};

export default {
  SET_DOCUMENT,
  TOGGLE_ADD_NEW_FOLDER_DIALOG,
  CLOSE_ADD_NEW_FOLDER_DIALOG,
  SHOW_DOCUMENT_ACTIONS_DIALOG,
  HIDE_DOCUMENT_ACTIONS_DIALOG
};
