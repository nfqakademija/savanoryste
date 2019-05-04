import { createStore, applyMiddleware } from 'redux';
import createSagaMiddleware from 'redux-saga';
import thunk from 'redux-thunk';
import rootReducer from './reducers';
import rootSaga from './sagas';
import { composeWithDevTools } from 'redux-devtools-extension';

const sagaMiddleware = createSagaMiddleware();

const store = createStore(
  rootReducer /* preloadedState, */,
  composeWithDevTools(applyMiddleware(sagaMiddleware, thunk))
);

sagaMiddleware.run(rootSaga);

export default store;
