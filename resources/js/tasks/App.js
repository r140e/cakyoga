import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import NewProject from './NewProject'
import ProjectsList from './ProjectsList'
import SingleProject from './SingleProject'
import CompletedList from './CompletedList'
import CompletedProject from './CompletedProject'

class App extends Component {
  render () {
    return (
      <BrowserRouter>
        <div>
          <Header />
          <Switch>
            <Route exact path='/projects' component={ProjectsList} />
            <Route path='/projects/create' component={NewProject} />
            <Route path='/projects/:id' component={SingleProject} />
            <Route exact path='/completed' component={CompletedList} />
            <Route path='/completed/:id' component={CompletedProject} />
          </Switch>
        </div>
      </BrowserRouter>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('tasks'))
