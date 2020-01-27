package ru.DenisPavelRafael.CustomerLoyaltyProgram;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class PointsAndHistoryActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_points_and_history);

        final TextView welcomeMessage = (TextView) findViewById(R.id.textViewWelcomeMsg);

        Intent intent = getIntent();
        String name = intent.getStringExtra("name");

        String message = name + " welcome";
        welcomeMessage.setText(message);
    }
    public void onClickGetCode(View view) {
        Intent intent = new Intent(this, UniqueCodeActivity.class);
        startActivity(intent);
    }
}
