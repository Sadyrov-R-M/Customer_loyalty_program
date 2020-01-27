package ru.DenisPavelRafael.CustomerLoyaltyProgram;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

public class AuthorizationActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_authorization);

        final EditText editTextLogin = (EditText) findViewById(R.id.editTextLogin);
        final EditText editTextPassword = (EditText) findViewById(R.id.editTextPassword);
        final Button buttonEnter = (Button) findViewById(R.id.buttonEnter);

        final TextView registerLink = (TextView) findViewById(R.id.textViewQuestion);

        registerLink.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent registerIntent = new Intent(AuthorizationActivity.this, RegistrationActivity.class);
                AuthorizationActivity.this.startActivity(registerIntent);
            }
        });

        buttonEnter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String login = editTextLogin.getText().toString();
                final String password = editTextPassword.getText().toString();

                Response.Listener<String> responseListener = new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            boolean success = jsonResponse.getBoolean("success");

                            if (success){
                                String name = jsonResponse.getString("name");

                                Intent intent = new Intent(AuthorizationActivity.this, PointsAndHistoryActivity.class);
                                intent.putExtra("name", name);
                                AuthorizationActivity.this.startActivity(intent);

                            } else {
                                AlertDialog.Builder builder = new AlertDialog.Builder(AuthorizationActivity.this);
                                builder.setMessage("Аккаунт не найден")
                                        .setNegativeButton("Попробовать снова", null)
                                        .create()
                                        .show();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                };

                AuthorizationRequest authorizationRequest = new AuthorizationRequest(login, password, responseListener);
                RequestQueue queue = Volley.newRequestQueue(AuthorizationActivity.this);
                queue.add(authorizationRequest);
            }
        });
    }
}
