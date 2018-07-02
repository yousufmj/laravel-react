import './bootstrap';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';
import Form from './components/Form';
import View from './components/View';

ReactDOM.render(
  <BrowserRouter>
    <div>
      <Route exact path="/" component={Form} />
      <Route path="/view" component={View} />
    </div>
  </BrowserRouter>,
  document.getElementById('app')
);
