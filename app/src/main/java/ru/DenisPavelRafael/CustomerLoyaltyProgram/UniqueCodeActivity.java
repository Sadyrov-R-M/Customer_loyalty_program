package ru.DenisPavelRafael.CustomerLoyaltyProgram;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class UniqueCodeActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_unique_code);
    }
    public void onClickOffers(View view) {
        Intent intent = new Intent(this, OffersActivity.class);
        startActivity(intent);
    }
}
