import axios from 'axios'
import React, { Component } from 'react'

class NewProject extends Component {
  constructor (props) {
    super(props)

    this.state = {
      name: '',
      place: '',
      tool: '',
      start: '',
      end: '',
      description: '',
      errors: []
    }

    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.handleCreateNewProject = this.handleCreateNewProject.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)
  }

  handleFieldChange (event) {
    this.setState({
      [event.target.name]: event.target.value
    })
  }

  handleCreateNewProject (event) {
    event.preventDefault()

    const { history } = this.props

    const project = {
      name: this.state.name,
      place: this.state.place,
      tool: this.state.tool,
      start: this.state.start,
      end: this.state.end,
      description: this.state.description
    }

    axios
      .post('/api/projects', project)
      .then(response => {
        // redirect to the homepage
        history.push('/projects')
      })
      .catch(error => {
        this.setState({
          errors: error.response.data.errors
        })
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

  render () {
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-6'>
            <div className='card'>
              <div className='card-header'>Create new project</div>

              <div className='card-body'>

                <form onSubmit={this.handleCreateNewProject}>

                  <div className='form-group'>
                    <label htmlFor='name'>Project name</label>
                    <input
                      id='name'
                      type='text'
                      className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                      name='name'
                      value={this.state.name}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('name')}
                  </div>

                  <div className='form-group'>
                    <label htmlFor='place'>Tempat</label>
                    <input
                      id='place'
                      type='text'
                      className={`form-control ${this.hasErrorFor('place') ? 'is-invalid' : ''}`}
                      name='place'
                      value={this.state.place}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('place')}
                  </div>

                  <div className='form-group'>
                    <label htmlFor='tool'>Alat</label>
                    <input
                      id='tool'
                      type='text'
                      className={`form-control ${this.hasErrorFor('tool') ? 'is-invalid' : ''}`}
                      name='tool'
                      value={this.state.tool}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('tool')}
                  </div>

                  <div className='form-group'>
                    <label htmlFor='start'>Mulai Pengerjaan</label>
                    <input
                      id='start'
                      type='date'
                      className={`form-control ${this.hasErrorFor('start') ? 'is-invalid' : ''}`}
                      name='start'
                      value={this.state.start}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('start')}
                  </div>

                  <div className='form-group'>
                    <label htmlFor='end'>Deadline</label>
                    <input
                      id='end'
                      type='date'
                      className={`form-control ${this.hasErrorFor('end') ? 'is-invalid' : ''}`}
                      name='end'
                      value={this.state.end}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('end')}
                  </div>

                  <div className='form-group'>
                    <label htmlFor='description'>Project description</label>
                    <textarea
                      id='description'
                      className={`form-control ${this.hasErrorFor('description') ? 'is-invalid' : ''}`}
                      name='description'
                      rows='10'
                      value={this.state.description}
                      onChange={this.handleFieldChange}
                    />

                    {this.renderErrorFor('description')}
                  </div>

                  <button className='btn btn-primary'>Create</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default NewProject
