package com.nhau.gadget;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBar;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.content.Context;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.support.v4.widget.DrawerLayout;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;


public class SupportActivity extends ActionBarActivity
        implements NavigationDrawerFragment.NavigationDrawerCallbacks {

    /**
     * Fragment managing the behaviors, interactions and presentation of the navigation drawer.
     */
    private NavigationDrawerFragment mNavigationDrawerFragment;

    /**
     * Used to store the last screen title. For use in {@link #restoreActionBar()}.
     */
    private CharSequence mTitle; // return super.getParent();
        //return super.getParent();

    private SupportActivity instance=this;

    public String texts;
    public ListView allTitles;
    public  String support="";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_support);
        //Bundle extras = getIntent().getExtras();
        setTitle("Live Support");

        mNavigationDrawerFragment = (NavigationDrawerFragment)
                getSupportFragmentManager().findFragmentById(R.id.navigation_drawer);
        mTitle = getTitle();

        // Set up the drawer.
        mNavigationDrawerFragment.setUp(
                R.id.navigation_drawer,
                (DrawerLayout) findViewById(R.id.drawer_layout));

        Button dialogOk=(Button)findViewById(R.id.submit);
        final EditText text=(EditText)findViewById(R.id.text);

        dialogOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
         support=text.getText().toString();
         startTask(support);
                Toast.makeText(get_activity(),
                        "Your problem has been sent to our technicians.",
                        Toast.LENGTH_LONG).show();
                Intent intent = new Intent(get_context(), SupportActivity.class);

                startActivity(intent);

            }
        });

        startTask("");
    }

    @Override
    public void onNavigationDrawerItemSelected(int position) {
        // update the main content by replacing fragments
        FragmentManager fragmentManager = getSupportFragmentManager();
        fragmentManager.beginTransaction()
                .replace(R.id.container, PlaceholderFragment.newInstance(position + 1))
                .commit();
    }

    public void onSectionAttached(int number) {
        switch (number) {
            case 1:
                mTitle = getString(R.string.title_section1);
                break;
            case 2:
                mTitle = getString(R.string.title_section2);
                break;
            case 3:
                mTitle = getString(R.string.title_section3);
                break;
        }
    }

    public void restoreActionBar() {
        ActionBar actionBar = getSupportActionBar();
        actionBar.setNavigationMode(ActionBar.NAVIGATION_MODE_STANDARD);
        actionBar.setDisplayShowTitleEnabled(true);
        //actionBar.setTitle(mTitle);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        if (!mNavigationDrawerFragment.isDrawerOpen()) {
            // Only show items in the action bar relevant to this screen
            // if the drawer is not showing. Otherwise, let the drawer
            // decide what to show in the action bar.
            getMenuInflater().inflate(R.menu.category, menu);
            restoreActionBar();
            return true;
        }
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        if (id == R.id.action_settings) {
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    /**
     * A placeholder fragment containing a simple view.
     */
    public static class PlaceholderFragment extends Fragment {
        /**
         * The fragment argument representing the section number for this
         * fragment.
         */
        private static final String ARG_SECTION_NUMBER = "section_number";

        /**
         * Returns a new instance of this fragment for the given section
         * number.
         */
        public static PlaceholderFragment newInstance(int sectionNumber) {
            PlaceholderFragment fragment = new PlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(ARG_SECTION_NUMBER, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        public PlaceholderFragment() {
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                Bundle savedInstanceState) {
            View rootView = inflater.inflate(R.layout.fragment_category, container, false);
            return rootView;
        }

        @Override
        public void onAttach(Activity activity) {
            super.onAttach(activity);
            ((SupportActivity) activity).onSectionAttached(
                    getArguments().getInt(ARG_SECTION_NUMBER));
        }
    }

    public Activity get_activity()
    {
        return SupportActivity.this;

    }



    public Context get_context()
    {

        return instance;


    }

    public void startTask(String text) {
        String name="delon";
        String password="delon";
        String result="";
        try {

            //myAsyncTask mTask = new myAsyncTask(get_context(), get_activity());
            myAsyncTask mTask = new myAsyncTask(get_context(), SupportActivity.this,text);
            result = mTask.execute(name, "10", password).get();
           // Log.d("SuccessLogin", result);
            //Log.d("Category",text);
        }
        catch (Exception e)
        {

            Log.d("LoginError","Error occurred "+e.toString());
        }
        //return result;
    }


    class myAsyncTask extends AsyncTask<String, Integer, String> {
        String mTAG = "myAsyncTask";
        private ProgressDialog dialog = new ProgressDialog(SupportActivity.this);

        ProgressDialog pleaseWaitDialog = ProgressDialog.show(
                SupportActivity.this,
                "Please Wait",
                "Sending your problem...",
                true);

        String result = "";
        Activity _activity;
        Context _context;
        String _text;
        String problems;


        public  myAsyncTask(Context context,Activity activity,String category)
        {
            this._activity=activity;
            this._context=context;
            this._text=category;

        }


        @Override
        protected void onPreExecute() { //do nothing
            pleaseWaitDialog.show();
                 }



        @Override
        protected String doInBackground(String...arg) { //do stuff in the background
            try {
                List<String> list=new ArrayList<String>();
                List<String> idList=new ArrayList<String>();
                Http http = new Http();
                Misc misc = new Misc();
                problems=http.getTickets(misc.getPhone(get_context()));
                if(problems != "NO_CONNECTION") {
                    Log.i("SupportActivity", problems);
                    allTitles = (ListView) findViewById(R.id.titles);
                    String[] arr = problems.split(";");
                    for (int x = 0; x < arr.length; x++) {
                        String[] blog = arr[x].split("-");
                        list.add(blog[0]);
                        idList.add(blog[1]);
                        //editor.putString(blog[1], blog[0]);

                    }
                    final String[] titles = list.toArray(new String[list.size()]);
                    final String[] ids = idList.toArray(new String[idList.size()]);
                    ListAdapter ad = new ArrayAdapter<String>(SupportActivity.this, android.R.layout.simple_list_item_1, titles);
                    allTitles.setAdapter(ad);
                    //allTitles.setOnClickListener();

                    allTitles.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                        public void onItemClick(AdapterView<?> parent, View itemClicked,
                                                int position, long id) {

                            if (_activity != null) {
                                Intent intent = new Intent(_activity, TicketActivity.class);
                                intent.putExtra("id", ids[position]);
                                startActivity(intent);
                            }
                        }
                    });
                }

                    if(_text !="") { //only run this part if user send problem
                        Xmpp xmpp = new Xmpp(get_activity());
                        xmpp.connect();

                        String num = misc.getPhone(get_context());
                        texts = http.setSupport(_text, num);


                        if (texts != "NO_CONNECTION") {
                            Toast.makeText(_activity,
                                    "Your problem has been sent to our technicians.",
                                    Toast.LENGTH_LONG).show();
                        } else {
                            Toast.makeText(_activity,
                                    "Sorry,your message could not be sent.Please try again..",
                                    Toast.LENGTH_LONG).show();
                        }
                    }

            }
            catch (Exception ex) {
                Log.i("Error", "Error occurred " + ex.toString());
            }



            try {
                Thread.sleep(1000);
            }
            catch (InterruptedException e) {
                e.printStackTrace();
            }

            return result;
        }

        @Override
        protected void onPostExecute(String result) {
            if (pleaseWaitDialog.isShowing()) {
                pleaseWaitDialog.dismiss();
            }
        }

    }



}
