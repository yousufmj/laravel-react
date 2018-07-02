import React, { Component } from 'react';
import { withStyles } from '@material-ui/core/styles';
import PropTypes from 'prop-types';
import Card from '@material-ui/core/Card';
import CardContent from '@material-ui/core/CardContent';
import {
  Table,
  TableHead,
  TableRow,
  TableCell,
  TableBody
} from '@material-ui/core';
import axios from 'axios';

const styles = theme => ({
  root: {
    display: 'flex',
    flexWrap: 'wrap',
    justifyContent: 'space-around',
    overflow: 'hidden',
    backgroundColor: theme.palette.background.paper,
    minHeight: 400,
    padding: 20
  }
});

/**
 * Display a form card
 */
class Form extends Component {
  constructor(props) {
    super(props);
    this.state = {
      entries: []
    };
  }

  componentDidMount() {
    axios.get('/api/entries').then(response => {
      this.setState({
        entries: response.data.results
      });
    });
  }

  render() {
    const classes = this.props;
    const { entries } = this.state;
    return (
      <div className={classes.root}>
        <Card>
          <CardContent>
            <h2>All Entries</h2>
            <Table>
              <TableHead>
                <TableRow>
                  <TableCell>Name</TableCell>
                  <TableCell>Email</TableCell>
                  <TableCell>Message</TableCell>
                </TableRow>
              </TableHead>
              <TableBody>
                {entries.map(e => {
                  return (
                    <TableRow key={e.id}>
                      <TableCell>{e.name}</TableCell>
                      <TableCell>{e.email}</TableCell>
                      <TableCell>{e.message}</TableCell>
                    </TableRow>
                  );
                })}
              </TableBody>
            </Table>
          </CardContent>
        </Card>
      </div>
    );
  }
}

Form.propTypes = {
  classes: PropTypes.object.isRequired
};
export default withStyles(styles)(Form);
