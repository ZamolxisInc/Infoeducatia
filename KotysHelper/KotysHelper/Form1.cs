using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Diagnostics;


namespace KotysHelper
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            timer1.Interval = 1500;
            timer1.Start();
            this.Hide();
            this.Opacity = 0;
            
        }

        private void IsProcessRunning(string sProcessName)
        {
            System.Diagnostics.Process[] proc = System.Diagnostics.Process.GetProcessesByName(sProcessName);
            if (proc.Length > 0)
            {
                //
            }
            else
            {
                try
                {
                    Process.Start(sProcessName);
                }
                catch (Exception s)
                {

                }
            }
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
           IsProcessRunning("Kotys");
        }
    }
}
