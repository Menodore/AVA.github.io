from flask import Flask, request, jsonify, render_template
import pandas as pd
from sklearn.tree import DecisionTreeClassifier
from sklearn.model_selection import train_test_split

app = Flask(__name__)

# Load and train the model
data = pd.read_csv('period.csv')
data.drop(['Height', 'Income'], axis=1, inplace=True)
data['Unusual_Bleeding'] = data['Unusual_Bleeding'].map({'no': 0, 'yes': 1})
data['Menses_score_binary'] = data['Menses_score'].apply(lambda x: 1 if x >= 4 else 0)
data.drop('Menses_score', axis=1, inplace=True)

features = ['Length_of_cycle', 'Length_of_menses', 'Weight', 'BMI', 'Unusual_Bleeding']
X = data[features]
y = data['Menses_score_binary']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)
model = DecisionTreeClassifier()
model.fit(X_train, y_train)

# Route to render period-test.html
@app.route('/')
def index():
    return render_template('period-test.html')

# API to handle form submission
@app.route('/predict', methods=['POST'])
def predict():
    input_data = request.form
    try:
        values = [float(input_data[feature]) for feature in features]
        prediction = model.predict([values])[0]
        result = "High Risk" if prediction == 1 else "Low Risk"
        return jsonify({'prediction': result})
    except Exception as e:
        return jsonify({'error': str(e)})

if __name__ == '__main__':
    app.run(debug=True)

