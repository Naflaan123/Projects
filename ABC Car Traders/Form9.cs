using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form9 : Form
    {
        public Form9()
        {
            InitializeComponent();
        }

        private void customer_details_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {
            // Create an instance of Form10
            Form10 form10 = new Form10();

            // Hide the current form (the form where label2 is located)
            this.Hide();

            // Show Form10
            form10.Show();
        }

        private void parts_details_Click(object sender, EventArgs e)
        {
            Form11 form11 = new Form11();

            this.Hide();

            form11.Show();
        }

        private void order_details_Click(object sender, EventArgs e)
        {
            Form14 form14 = new Form14();

            this.Hide();

            form14.Show();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 form1 = new Form1();

            this.Hide();

            form1.Show();
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {
            Form15 form15 = new Form15();

            this.Hide();

            form15.Show();
        }
    }
}
