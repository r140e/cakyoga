import axios from 'axios';
import React, { Component } from 'react';
import { Link } from 'react-router-dom'

class CompletedProject extends Component {
  constructor (props) {
    super(props)

    this.state = {
      project: {},
      tasks: [],
      title: '',
      errors: []
    }

    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)
    this.handleMarkProjectAsUnCompleted = this.handleMarkProjectAsUnCompleted.bind(
      this
    )
  }

  componentDidMount () {
    const projectId = this.props.match.params.id

    axios.get(`/api/completed/${projectId}`).then(response => {
      this.setState({
        project: response.data,
        tasks: response.data.tasks
      })
    })
  }

  handleFieldChange (event) {
    this.setState({
      title: event.target.value
    })
  }


  hasErrorFor (field) {
    return !!this.state.errors[field]
  }

  renderErrorFor (field) {
    if (this.hasErrorFor(field)) {
      return (
        <span className='invalid-feedback'>
          <strong>{this.state.errors[field][0]}</strong>
        </span>
      )
    }
  }

  handleMarkProjectAsUnCompleted () {
    const { history } = this.props

    axios
      .put(`/api/completed/${this.state.project.id}`)
      .then(response => history.push('/projects'))
  }

  handleMarkTaskAsCompleted (taskId) {
    axios.put(`/api/tasks/${taskId}`).then(response => {
      this.setState(prevState => ({
        tasks: prevState.tasks.filter(task => {
          return task.id !== taskId
        })
      }))
    })
  }

  render () {
    const { project, tasks } = this.state

    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <div className='card'>
              <div className='card-header'>{project.name}</div>

              <div className='card-body'>
                <p>Tempat: {project.place}</p>
                <p>Alat: {project.tool}</p>
                <p>Mulai Pengerjaan: {project.start}</p>
                <p>Deadline: {project.place}</p>
                <p>Deskripsi: {project.description}</p>
                <button
                  className='btn btn-primary btn-sm'
                  onClick={this.handleMarkProjectAsUnCompleted}
                >
                  Mark as uncompleted
                </button>

                <hr />

                <ul className='list-group mt-3'>
                  {tasks.map(task => (
                    <li
                      className='list-group-item d-flex justify-content-between align-items-center'
                      key={task.id}
                    >
                      {task.title}

                    </li>
                  ))}

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default CompletedProject
