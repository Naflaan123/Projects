using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form13 : Form
    {
        private SqlConnection connection;

        public Form13()
        {
            InitializeComponent();
            // Initialize SQL connection
            connection = new SqlConnection("Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True");
        }

        private void Form13_Load(object sender, EventArgs e)
        {
            // Set all text boxes to read-only except for the OrderStatus
            textBox1.ReadOnly = true; // OrderID
            textBox2.ReadOnly = true; // CustomerID
            textBox3.ReadOnly = true; // OrderDate
            textBox5.ReadOnly = true; // TotalAmount
            textBox6.ReadOnly = true; // ItemName
            textBox4.ReadOnly = false; // OrderStatus (editable)
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            try
            {
                connection.Open();
                var query = "UPDATE orderdetails SET OrderStatus = @OrderStatus WHERE OrderID = @OrderID";
                var command = new SqlCommand(query, connection);

                command.Parameters.AddWithValue("@OrderID", textBox1.Text);
                command.Parameters.AddWithValue("@OrderStatus", textBox4.Text); // Only update OrderStatus

                command.ExecuteNonQuery();
                MessageBox.Show("Order Updated Successfully!");
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                connection.Close();
            }
        }

        private void search_button_Click(object sender, EventArgs e)
        {
            try
            {
                connection.Open();
                var query = "SELECT * FROM orderdetails WHERE OrderID = @OrderID";
                var command = new SqlCommand(query, connection);

                command.Parameters.AddWithValue("@OrderID", search_box.Text);

                var reader = command.ExecuteReader();
                if (reader.Read())
                {
                    textBox1.Text = reader["OrderID"].ToString();
                    textBox2.Text = reader["CustomerID"].ToString();
                    textBox3.Text = reader["OrderDate"].ToString();
                    textBox4.Text = reader["OrderStatus"].ToString();
                    textBox5.Text = reader["TotalAmount"].ToString();
                    textBox6.Text = reader["ItemName"].ToString();
                }
                else
                {
                    MessageBox.Show("Order not found.");
                }
                reader.Close();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                connection.Close();
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();

            this.Hide();

            form3.Show();
        }

        private void search_box_TextChanged(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }
    }
}
