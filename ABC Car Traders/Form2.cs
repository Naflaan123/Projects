using System;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient; // Use only System.Data.SqlClient

namespace ABC_Car_Traders
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

            using (SqlConnection con = new SqlConnection(connectionString))
            {
                con.Open();
                string query = "SELECT COUNT(*) FROM loginapp WHERE username=@username AND password=@password";
                using (SqlCommand cmd = new SqlCommand(query, con))
                {
                    cmd.Parameters.AddWithValue("@username", txtUser.Text);
                    cmd.Parameters.AddWithValue("@password", txtPass.Text);
                    int count = (int)cmd.ExecuteScalar();

                    if (count > 0)
                    {
                        // Show a success message
                        MessageBox.Show("Login success", "Info", MessageBoxButtons.OK, MessageBoxIcon.Information);

                        // Create an instance of Form3
                        Form3 form3 = new Form3();

                        // Hide the current form (Form2)
                        this.Hide();

                        // Show Form3
                        form3.Show();
                    }
                    else
                    {
                        MessageBox.Show("Error in login");
                    }
                }
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void checkBox1_CheckedChanged(object sender, EventArgs e)
        {
            txtPass.PasswordChar = checkBox1.Checked ? '\0' : '*';
        }

        private void Form2_Load(object sender, EventArgs e)
        {

        }
    }
}
