namespace ABC_Car_Traders
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Create an instance of Form2
            Form2 form2 = new Form2();

            // Hide the current form (Form1)
            this.Hide();

            // Show Form2
            form2.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            // Create an instance of Form8
            Form8 form8 = new Form8();

            // Hide the current form (the form where button2 is located)
            this.Hide();

            // Show Form8
            form8.Show();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }
    }
}
