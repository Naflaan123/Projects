using System;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form14 : Form
    {
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form14()
        {
            InitializeComponent();
        }

        private void search_button_Click(object sender, EventArgs e)
        {
            string orderId = search_box.Text.Trim();

            if (string.IsNullOrEmpty(orderId))
            {
                MessageBox.Show("Please enter an Order ID.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                return;
            }

            // Fetch order details from the database
            FetchOrderDetails(orderId);
        }

        private void FetchOrderDetails(string orderId)
        {
            using (SqlConnection con = new SqlConnection(connectionString))
            {
                try
                {
                    con.Open();
                    string query = "SELECT OrderID, CustomerID, OrderDate, TotalAmount, OrderStatus, ItemName FROM orderdetails WHERE OrderID = @OrderID";
                    using (SqlCommand cmd = new SqlCommand(query, con))
                    {
                        cmd.Parameters.AddWithValue("@OrderID", orderId);
                        SqlDataReader reader = cmd.ExecuteReader();

                        if (reader.Read())
                        {
                            textBox1.Text = reader["OrderID"].ToString();
                            textBox2.Text = reader["CustomerID"].ToString();
                            textBox3.Text = reader["OrderDate"].ToString();
                            textBox5.Text = reader["TotalAmount"].ToString();
                            textBox4.Text = reader["OrderStatus"].ToString();
                            textBox6.Text = reader["ItemName"].ToString();
                        }
                        else
                        {
                            MessageBox.Show("Order ID not found.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                        }
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("An error occurred: " + ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form9 form9 = new Form9();

            this.Hide();

            form9.Show();
        }
    }
}
